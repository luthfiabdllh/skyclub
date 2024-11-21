<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FieldDescription;
use App\Models\FieldPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fieldConfiguration extends Controller
{
    public function fieldPhoto(){
        $images = Storage::disk('public')->files('images/images');
        $fieldPhotos = FieldPhoto::all();

        return view('admin.field.fieldPhotos', compact('fieldPhotos', 'images'));
    }

    public function fieldDescription(){
        $fieldDescription = FieldDescription::first();

        return view('admin.field.description', compact('fieldDescription'));
    }

    public function fieldFasility(){
        return view('admin.field.fasility');
    }

    public function uploadSlider(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,svg|max:3048',
            'fileIndex' => 'required|integer|min:1|max:3', // Validate the file index
        ]);

        if ($request->file('file')->isValid()) {
            // Determine the file name based on the file index
            $fileIndex = $request->input('fileIndex');
            $fileName = "album_{$fileIndex}." . $request->file('file')->getClientOriginalExtension();

            // Store the file and replace if it already exists
            $filePath = $request->file('file')->storeAs('images/slider', $fileName, 'public');

            return response()->json([
                'success' => true,
                'path' => asset('storage/' . $filePath),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File upload failed!',
        ], 400);
    }

    public function uploadBanner(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,svg|max:3048',
            'fileIndex' => 'required|integer|min:1|max:3', // Validate the file index
        ]);

        if ($request->file('file')->isValid()) {
            // Determine the file name based on the file index
            $fileIndex = $request->input('fileIndex');
            $fileName = "banner_{$fileIndex}." . $request->file('file')->getClientOriginalExtension();

            // Store the file and replace if it already exists
            $filePath = $request->file('file')->storeAs('images/banner', $fileName, 'public');

            return response()->json([
                'success' => true,
                'path' => asset('storage/' . $filePath),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File upload failed!',
        ], 400);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() .'_' . uniqid() . '_' . $file->getClientOriginalName();

            // Cek apakah file sudah ada di database
            $existingPhoto = FieldPhoto::where('photo', $fileName)->first();
            if (!$existingPhoto) {
                // Simpan file ke folder storage/app/public/images/images
                $path = $file->storeAs('images/images', $fileName, 'public');

                FieldPhoto::create([
                    'photo' => $fileName,
                ]);
            } else {
                $path = 'images/images/' . $fileName;
            }

            // Kembalikan path file yang disimpan
            return response()->json(['success' => $fileName, 'path' => $path]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function deleteImage($id)
    {
        $photo = FieldPhoto::find($id);

        if ($photo) {
            $filePath = 'images/images/' . $photo->photo;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);

                // Delete the record from the database
                $photo->delete();

                return response()->json(['success' => true, 'message' => 'File deleted successfully']);
            }

            return response()->json(['success' => false, 'message' => 'File not found'], 404);
        }

        return response()->json(['success' => false, 'message' => 'Photo not found'], 404);
    }

    public function updateDescription(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:2999',
        ]);

        // Assuming you have a single description to update
        $fieldDescription = FieldDescription::first();

        if (!$fieldDescription) {
            $fieldDescription = new FieldDescription();
        }

        $fieldDescription->description = $request->input('description');
        $fieldDescription->save();

        return response()->json([
            'success' => true,
            'message' => 'Description updated successfully!',
        ]);
    }
}

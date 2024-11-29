import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import ImageTool from '@editorjs/image';
import Quote from '@editorjs/quote';
import Embed from '@editorjs/embed';
import Checklist from '@editorjs/checklist';
import LinkTool from '@editorjs/link';
import List from '@editorjs/list';
import Table from '@editorjs/table'
import axios from 'axios';
import Warning from '@editorjs/warning';
import Delimiter from '@editorjs/delimiter';

let saveBtn = document.getElementById('save-data');

if (saveBtn) {
    let meta = document.head.querySelector('meta[name="csrf-token"]');

    console.log(meta);

    const editor = new EditorJS({
        holder: 'editorjs',
        placeholder: 'Tulis artikel disini...',

        tools: {
            header: {
                class: Header,
                inlineToolbar: true,
                config: {
                    placeholder: 'Enter a header',
                    levels: [1, 2, 3, 4, 5], // Tentukan level header yang diizinkan
                    defaultLevel: 3, // Level default
                    defaultStyle: {
                        1: 'text-4xl font-extrabold',
                        2: 'text-3xl font-bold',
                        3: 'text-3xl font-bold',
                        4: 'text-xl font-medium',
                        5: 'text-lg font-normal',
                      },
                },
            },
            list: {
                class: List,
                inlineToolbar: true,
            },
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: '/admin/article/upload-image', // Endpoint untuk upload file
                        byUrl: '/admin/article/fetch-image', // Endpoint untuk fetch URL gambar
                    },
                    additionalRequestHeaders: {
                        'X-CSRF-TOKEN': meta.content,
                    },
                }
            },
            checklist: {
                class: Checklist,
                inlineToolbar: true,
            },
            linkTool: {
                class: LinkTool,
                config: {
                    endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching,
                }
            },
            embed: Embed,
            quote: Quote,
            delimiter: Delimiter,
            warning: {
                class: Warning,
                inlineToolbar: true,
                config: {
                  titlePlaceholder: 'Title',
                  messagePlaceholder: 'Message',
                },
            },
            table: {
                class: Table,
                inlineToolbar: true,
                config: {
                  rows: 2,
                  cols: 2,
                  maxRows: 10,
                  maxCols: 6,
                },
            },
        },
        onReady: () => {
            document.getElementById('editorjs').classList.add('prose', 'max-w-none');
            console.log('Editor.js is ready to work!');
        },
        onChange: () => {
            console.log('Now I know that Editor\'s content changed!');
        },
        rendered: () => {
            console.log('Editor.js has been rendered');
        }
    });

    saveBtn.addEventListener('click', (e) => {
        e.preventDefault();

        let aTag = e.target;
        const url = aTag.getAttribute('href');
        const title = document.getElementById('title').value;

        console.log(url);

        editor.save().then((outputData) => {
            console.log('Article data: ', outputData);

            // Kirim data menggunakan Axios
            axios({
                method: 'post',
                url: url,
                data: {
                    title: title,
                    content: outputData,
                },
                headers: {
                    'X-CSRF-TOKEN': meta.content,
                }
            })
            .then((response) => {
                console.log('Data saved successfully: ', response);
                window.location.href = '/admin/article';
            })
            .catch((error) => {
                console.error('Error saving data: ', error);
            });
        }).catch((error) => {
            console.error('Saving failed: ', error);
        });
    }, false);
}

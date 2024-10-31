<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">
    <x-navbar></x-navbar>
    <div class="min-h-full px-16">
        <div class="grid grid-cols-2 mt-20">
            <div class="grid grid-cols-1 content-between w-[420px]">
                <div class=" space-y-8">
                    <p>artikel / isi</p>
                    <h3 class=" text-5xl font-bold leading-tight">Manchester United VS Real Madrid</h3>
                </div>
                <div class=" space-y-8">
                    <div>
                        <p>By <span class=" font-semibold">Allan Raditya</span></p>
                        <div class="flex items-center">
                            <p>11 Jan 2022</p>
                            <span class="w-1.5 h-1.5 mx-1.5 bg-black rounded-full"></span>
                            <p>5 min read</p>
                        </div>
                    </div>
                    <div>
                        <p class=" font-semibold mb-4">Share this post</p>
                        <div class="flex space-x-2">
                            <div class="rounded-full bg-gray-300 p-1">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                              </svg>
                            </div>
                            <div class="rounded-full bg-gray-300 p-1">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                                  </svg>
                            </div>
                            <div class="rounded-full bg-gray-300 p-1">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                                </svg>
                            </div>
                            <div class="rounded-full bg-gray-300 p-1">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div >
                <img class="h-[450px] object-cover" src="{{ Storage::url('images/banner.svg') }}" alt="">
            </div>
        </div>

        <article class="mt-28 mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint sit, voluptate perferendis nemo cum ipsa cupiditate odit. Est odio et vitae quod at? Excepturi expedita amet deserunt animi perspiciatis possimus!
            Nostrum quidem ratione, reprehenderit ducimus eius incidunt nemo at commodi? Officiis ratione voluptates libero provident molestias aspernatur dolorem odio non. A quidem eveniet optio quis quos fugit architecto sequi soluta?
            Itaque, voluptas dolorem? Corrupti assumenda culpa nobis neque autem nulla excepturi molestiae provident recusandae perspiciatis? Cum at dolore perferendis quisquam, ipsa consectetur quas nihil iusto, ab cumque sequi doloribus vel?
            Illum voluptas incidunt itaque cupiditate, exercitationem qui dolorem, ipsam deserunt aliquam, est alias praesentium error quam consequatur? Natus reiciendis earum, sed, nesciunt ipsum vitae maxime amet id placeat, labore explicabo?
            Iure, aliquam? Ipsam cumque dicta corrupti molestias vitae, inventore aut nihil cum? Consequatur, eaque vitae? Officia sint adipisci libero ad magni tempore nam, consectetur ipsa dolores similique eaque sapiente accusantium.
            Eaque dolor quod cupiditate veniam consequuntur! Eos voluptas officiis cum ab reprehenderit similique exercitationem, animi dolor maiores impedit laboriosam assumenda pariatur necessitatibus reiciendis saepe dignissimos molestias quaerat sapiente dolorem omnis.
            Odit incidunt ullam, quidem necessitatibus consequuntur quaerat delectus. Vitae similique, quasi, at obcaecati incidunt officiis commodi adipisci reprehenderit voluptatem accusantium consequuntur tempore? Tenetur eaque, modi quidem officiis ea quasi. Tenetur?
            Dolor adipisci harum temporibus eum quas repellat, aperiam veniam, atque incidunt et at qui perspiciatis! Rem, id tenetur architecto non dolor, sint velit, obcaecati mollitia minima alias quis deleniti incidunt.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quis molestias nam ipsa architecto facilis adipisci itaque. Odit eligendi tenetur placeat et accusamus, voluptates voluptatem veritatis id repellat, a ullam.
            Magnam ab aut nobis assumenda dolor dolore maiores illo, eius recusandae debitis modi alias fugiat a voluptate id veritatis soluta optio hic praesentium et officiis dolorem saepe eaque distinctio. Assumenda!
            Tenetur voluptatem facilis officiis natus. Minus accusamus consequatur expedita a. Cum et minus dolorum cumque, suscipit dolorem ipsam laudantium inventore, libero, id debitis praesentium illum dolore soluta vel veritatis mollitia!
            Tempora quasi cupiditate sint fugiat, vitae libero reprehenderit quibusdam est officiis ratione quae laudantium ducimus, molestias tempore nihil et quaerat? Facilis molestiae saepe voluptatum nam, rem autem nemo error? Sequi.

            <div class="mt-16">
                <p class=" font-semibold mb-4">Share this post</p>
                <div class="flex space-x-2">
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                            <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                            </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                        </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
            <hr class="h-px my-10 bg-gray-400 border-0 dark:bg-gray-700">
            <div class="flex space-x-4">
                <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
                <div>
                    <p class=" font-semibold">Jamal Sigh</p>
                    <p>11 Jan 2024</p>
                </div>
            </div>
        </article>


        {{-- blog --}}
        <div class="mt-28 mb-20">
            <div class="flex justify-between ">
                <div class="space-y-4">
                    <h6 class="text-base font-bold">Artikel</h6>
                    <h1 class="text-5xl font-bold">Artikel Serupa</h1>
                    <h5 class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h5>
                </div>
                <div class=" self-end">
                    <button type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Semuanya</button>
                </div>
            </div>
            <div class="flex justify-between pt-20" >
                @for ($x = 0; $x < 3; $x++)
                    <div class="border" style="width: 416px">
                        <img src="{{ Storage::url('images/blog-image.svg') }}" alt="">
                        <div class=" flex-col p-6 space-y-6">
                            <div class="max-w-sm space-y-2">
                                <p class=" text-sm font-semibold">Pertandingan</p>
                                <h4 class=" text-2xl font-bold">Persija vs Areama FC</h4>
                                <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
                            </div>
                            <div class="flex space-x-4">
                                <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
                                <div>
                                    <p class=" font-semibold">Jamal Sigh</p>
                                    <p>11 Jan 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <x-bottom></x-bottom>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>

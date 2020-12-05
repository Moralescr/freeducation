<x-AppLayout>
    <!--Header-->
    <section class="bg-cover" style="background-image: url({{asset('img/cursos/image1.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Todos los cursos</h1>
                <p class="text-white text-lg mt-2 mb-4">
                    There are many variations of passages of Lorem
                    Ipsum available, butty have suffered alteration
                </p>

                @livewire('search')
                
            </div>
        </div>
    </section>
    <!--End header-->

    @livewire('course-index')

</x-AppLayout>

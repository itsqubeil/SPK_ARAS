<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
    ARAS (Additive Ratio Assessment)
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        
Metode ARAS (Additive Ratio Assessment) adalah salah satu metode pengambilan keputusan multi-kriteria yang dikenal efektif dalam menilai dan membandingkan berbagai alternatif. Metode ini memungkinkan pengambil keputusan untuk menganalisis alternatif-alternatif berdasarkan sejumlah kriteria yang relevan, memberikan hasil yang lebih objektif dan transparan.
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="{{ route('alternatif.index') }}">Alternatif</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
        Alternatif adalah pilihan atau opsi yang tersedia untuk dievaluasi berdasarkan kriteria yang telah ditentukan. Alternatif merupakan solusi potensial yang dapat dipilih untuk mencapai tujuan atau memecahkan masalah tertentu. Alternatif harus beragam, dapat diterapkan, dan dapat dievaluasi.
</p>
        <p class="mt-4 text-sm">
            <a href="{{ route('alternatif.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                Buka menu Alternatif

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="{{ route('kriteria.index') }}">Kriteria</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
        Kriteria adalah parameter atau ukuran yang digunakan untuk mengevaluasi dan membandingkan berbagai alternatif. Kriteria membantu menentukan seberapa baik setiap alternatif memenuhi tujuan atau persyaratan tertentu. Kriteria harus relevan, terukur, dapat dibandingkan, komprehensif, dan tidak bertentangan.
    </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('kriteria.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                Buka menu Kriteria

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

   
</div>

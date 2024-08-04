<section id="about" class="about">

    <div class="row">
        <div class="col">
            <img loading="lazy" data-aos="zoom-in-right" data-aos-duration="1000" class="img-fluid img"
                src="{{ asset('storage/image/poto2.png') }}" alt="">
        </div>
        <div class="col">
            <div class="container border-3 ">
                <h2 data-aos="fade-up" data-aos-duration="1100">
                    Tentang Saya
                </h2>
                <br>
                <p data-aos="fade-up" data-aos-duration="1200">
                    Hi, Nama saya <span style="color: purple;">Sawalinto</span>
                    Saya bekerja sebagai Design Graphic di salah satu
                    perusahaan di kota Medan dan juga
                    Freelancer Web Developer.
                    <br>
                    Saya tertarik belajar tentang teknologi dan
                    saya banyak mempelajari hal baru tentang teknologi secara otodidak
                    maupun mengikuti course online dalam beberapa tahun
                    terahkir.
                </p>
                <hr data-aos="fade-up" data-aos-duration="1300" style="width: 100%;">
                <div data-aos="fade-up" data-aos-duration="1400" class="card">
                    <div class="card-body">
                        <h2 data-aos="fade-up" data-aos-duration="1500">Pendidikan</h2>

                        @foreach ($pendidikan as $pen)
                            <div data-aos="fade-up" data-aos-duration="1600" class="child-pendidikan ">
                                <button type="button" class="btn btn-secondary"><i class="fas fa-graduation-cap"></i>
                                    {{ $pen->sekolah }}</button>
                                <span class="spendidikan mt-3">
                                    <h6><i class="bi bi-person-fill-check"></i></i> {{ $pen->jurusan }}</h6>
                                </span>
                                <span class="spendidikan mt-3">
                                    <h6><i class="bi bi-check-square-fill"></i>{{ date('Y', strtotime($pen->start)) }} -
                                        {{ $pen->end === 'Sekarang' ? 'Sekarang' : date('Y', strtotime($pen->end)) }}</h6>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-duration="1700" class="card mt-4 mb-4">
                    <div class="card-body">
                        <h2 data-aos="fade-up" data-aos-duration="1800" class="mb-2">Pengalaman</h2>

                        @php
                            $i = 100;
                        @endphp

                        @foreach ($pengalaman as $index => $ex)
                            <div data-aos="fade-up" data-aos-duration="{{ 1800 + $i * $index }}"
                                class="child-pendidikan ">
                                <button type="button" class="btn btn-secondary"><i class="fas fa-laptop-code"></i>
                                    {{ $ex->perusahaan }}</button>
                                <span class="spendidikan mt-3">
                                    <h6><i class="bi bi-person-fill-check"></i></i> {{ $ex->job }}</h6>
                                </span>
                                <span class="spendidikan mt-3">
                                    <h6><i class="bi bi-check-square-fill"></i>{{ date('Y', strtotime($ex->start)) }} -
                                        {{ $ex->end === 'Sekarang' ? 'Sekarang' : date('Y', strtotime($ex->end)) }}</h6>
                                </span>
                            </div>
                        @endforeach




                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

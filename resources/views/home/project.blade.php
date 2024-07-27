<section id="project" class="project">
    <div class="row">


        <div class="col mb-3 wd ">
            <h1 data-aos="fade-up" data-aos-duration="1500" class="text-center mb-3">
                Project
            </h1>
            <div class="tab d-flex justify-content-center mx-auto">
                <button data-aos="fade-up" data-aos-duration="1600" class="tablinkss btn" id="defaultPro"
                    onclick="openProject(event, 'Web')">Web</button>

                <button data-aos="fade-up" data-aos-duration="1700" class="tablinkss btn "
                    onclick="openProject(event, 'Design')">Design</button>
            </div>
            <hr>
            <div class="bung d-flex justify-content-center">
                <div id="Web" class="tabcontents text-center">
                    @foreach ($programmer as $program)
                        <div data-aos="fade-up" data-aos-duration="1800" class="card" style="width: 16rem;">
                            <img loading="lazy" src="{{ asset('storage/thumbnails/' . $program->thumbnail) }}"
                                style="width: 100%; height: 200px; object-fit: cover" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $program->name }}</h5>

                                <div class="line">
                                    @foreach (json_decode($program->tools) as $tools)
                                        <img loading="lazy" src="{{ asset('storage/svg/' . $tools->name . '.svg') }}"
                                            alt="" class="img-thumbnail">
                                    @endforeach
                                </div>
                                <a href="{{ $program->link }}" target="_blank" class="btn btn-primary"><i
                                        class="fa-solid fa-square-arrow-up-right fa-fade"></i> Kunjungi</a>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div id="Design" class="tabcontents text-center ">
                    <div class="align-items-start ">
                        @foreach ($multimedia as $multi)
                            <div class="card" style="width: 16rem;">
                                <img loading="lazy" src="{{ asset('storage/thumbnails/' . $multi->thumbnail) }}"
                                style="width: 100%; height: 200px; object-fit: cover" class="card-img-top"
                                alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$multi->name}}</h5>

                                    <div class="line">
                                        @foreach (json_decode($multi->tools) as $mul)
                                            <img loading="lazy" src="{{ asset('storage/svg/' . $mul->name . '.svg') }}"
                                                alt="" class="img-thumbnail">
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

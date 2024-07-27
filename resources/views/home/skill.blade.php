<section id="skill" class="skill">
    <div class="row">


        <div class="col mb-3 wd ">
            <h1 data-aos="fade-up" data-aos-duration="1500" class="text-center mb-3">
                Skills
            </h1>
            <div class="tab d-flex justify-content-center mx-auto">
                <button data-aos="fade-up" data-aos-duration="1600" class="tablinks btn" id="defaultOpen"
                    onclick="openCity(event, 'Programming')">Programming</button>

                <button data-aos="fade-up" data-aos-duration="1700" class="tablinks btn "
                    onclick="openCity(event, 'Multimedia')">Multimedia</button>
            </div>
            <hr>
            <div class="bung d-flex justify-content-center">
                <div id="Programming" class="tabcontent text-center">
                    @php
                        $delay = 1800;
                        $plus = 100;
                    @endphp
                    @foreach ($sPro as $index => $program)
                        <img loading="lazy" data-aos="fade-up" data-aos-duration="{{ $delay + $plus * ($index + 1) }}"
                            src="{{ asset('storage/svg/' . $program->icon) }}" class="img-thumbnail" alt="">
                    @endforeach

                </div>
                <div id="Multimedia" class="tabcontent text-center">
                    @foreach ($sMulti as $index => $multi)
                        <img loading="lazy" data-aos="fade-up" data-aos-duration="{{ $delay + $plus * ($index + 1) }}"
                            src="{{ asset('storage/svg/' . $multi->icon) }}" class="img-thumbnail" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

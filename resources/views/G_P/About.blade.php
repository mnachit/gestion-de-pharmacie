@extends('home')

@section('content1')
    {{-- hhhhhhhh --}}
    <div class="site-section bg-light custom-border-bottom">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 order-md-2">
                    <div class="block-16">
                        <figure>
                            <img src="https://raw.githubusercontent.com/philanthropist-mnachit/ges/main/images/bg_1.jpg"
                                alt="Image placeholder" class="img-fluid rounded">
                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span
                                    class="icon-play"></span></a>

                        </figure>
                    </div>
                </div>
                <div class="col-md-5 mr-auto">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">We Are Trusted Company</h2>
                    </div>
                    <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat, dicta at
                        laboriosam, nemo
                        exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos sequi
                        hic fugiat
                        asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum quas.</p>
                    <p class="text-black">Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt nulla
                        illum autem in, quibusdam
                        cumque recusandae, laudantium minima repellendus.</p>

                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light custom-border-bottom">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>The Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 mb-5">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('/img/username/dnachit.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">Idriss Nachit</h3>
                                <p class="block-38-subheading">CEO/Co-Founder</p>
                            </div>
                            <div class="block-38-body">
                                <p>I am incredibly proud to be a part of Pharma-NACHIT, a company that is dedicated to
                                    improving people's lives through the development of high-quality pharmaceutical
                                    products. As CEO/Co-founder, I have witnessed firsthand the commitment and hard work
                                    that my team puts in every day to ensure that our products are safe, effective, and
                                    affordable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-5">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('/img/username/bnachit.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">Brahim Nachit</h3>
                                <p class="block-38-subheading">Sales Manager</p>
                            </div>
                            <div class="block-38-body">
                                <p>I am honored to be a part of a company that is making a positive impact on the world, and
                                    I am excited to see what the future holds for Pharma-NACHIT. Together, we will continue
                                    to drive innovation, push the limits of what is possible, and make a real difference in
                                    the lives of people around the world.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-5 mx-auto">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('/img/username/mnachit.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">Mohamed NACHIT</h3>
                                <p class="block-38-subheading">Developer</p>
                            </div>
                            <div class="block-38-body">
                                <p>As a developer at Pharma-NACHIT, I am proud to be a part of a company that is committed to making a positive impact on people's lives. Our team is dedicated to developing innovative solutions that address some of the most pressing healthcare challenges of our time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

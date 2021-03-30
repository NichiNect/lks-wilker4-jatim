@extends('layouts.frontend')

@section('style')
<style>
    html {
        scroll-behavior: smooth;
    }
    .jumbotron {
        min-height: 500px;
    }
    .garis {
        max-width: 60%;
        border: 1px solid #535351;
    }
</style>
@endsection

@section('content')
<div class="jumbotron mb-0">
    <div class="container">
        <h1 class="display-4">Website Portal Artikel</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-lg-8">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab provident ad facere, aut numquam hic quia perspiciatis nam laudantium doloremque eaque iusto vel! Nisi officia facere reiciendis quam voluptatibus corrupti! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores facere quod nulla, impedit eum ad laboriosam praesentium iusto dicta. Est veritatis eligendi repellendus ea facere numquam ut ipsa maiores rem.
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum earum est obcaecati quibusdam aliquid possimus sed natus omnis, similique dicta optio error, aspernatur esse fugit consequatur sit? Quaerat, architecto corrupti? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur, corporis. Exercitationem cupiditate consequatur ducimus rerum architecto at magni veniam quia necessitatibus velit, corrupti tenetur non, a reiciendis pariatur voluptatem quo.
                </p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/jumbotron.svg') }}" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#e9ecef" fill-opacity="1" d="M0,0L24,42.7C48,85,96,171,144,186.7C192,203,240,149,288,112C336,75,384,53,432,90.7C480,128,528,224,576,234.7C624,245,672,171,720,154.7C768,139,816,181,864,181.3C912,181,960,139,1008,106.7C1056,75,1104,53,1152,69.3C1200,85,1248,139,1296,176C1344,213,1392,235,1416,245.3L1440,256L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path>
</svg>

<section id="about">
    <div class="container">
        <div class="row text-center my-3">
            <div class="col-lg-12">
                <h1>About</h1>
                <hr class="garis">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p><i>Website ini adalah web portal artikel yang dibuat untuk mendistribusikan karya tulis artikel untuk seluruh siswa/siswi SMK maupun SMA.</i> <br> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi eos perspiciatis provident? Odio dolores alias iste ad architecto assumenda dignissimos saepe, incidunt quas debitis cum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae et quae asperiores a consequuntur iusto enim quia eaque dolor amet id nulla nesciunt nostrum nemo, sit minus ut eius maxime. <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores vero deleniti, odio quam architecto tempora! Iure aperiam qui recusandae! Temporibus id alias atque neque quos architecto adipisci ipsum esse vel. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis officiis dolore ex sunt assumenda soluta ratione fugiat velit obcaecati non repellendus excepturi iure, ipsa facilis distinctio aliquam culpa illum beatae.</p>
            </div>
            <div class="col-md-6">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero iure nobis maiores repellat eos. Dignissimos itaque officia inventore quisquam maiores accusantium modi, culpa nam, perferendis commodi necessitatibus quas hic cumque libero voluptas placeat iure cupiditate. Doloribus vero nam, pariatur ab ut aliquam harum aliquid, eligendi qui architecto autem maxime numquam. <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, eveniet autem. Voluptate sunt sapiente autem pariatur magni reiciendis nostrum neque? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, dolorum?
                </p>
            </div>
        </div>
    </div>
</section>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#e9ecef" fill-opacity="1" d="M0,192L26.7,170.7C53.3,149,107,107,160,101.3C213.3,96,267,128,320,160C373.3,192,427,224,480,213.3C533.3,203,587,149,640,138.7C693.3,128,747,160,800,186.7C853.3,213,907,235,960,229.3C1013.3,224,1067,192,1120,197.3C1173.3,203,1227,245,1280,245.3C1333.3,245,1387,203,1413,181.3L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
</svg>

<section id="article" style="background-color: #e9ecef;">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col-lg-12">
                <h1>News Article</h1>
                <hr class="garis">
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $a)
                <div class="col-md-6 my-2">
                    <div class="card kard shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('/storage/article/picture/' . $a->picture) }}" alt="" class="img-thumbnail" style="max-width: 100%">
                                </div>
                                <div class="col-md-8">
                                    <h4>
                                        <a href="{{ route('frontend.showarticle', $a) }}">{{ Str::limit($a->title, 20) }}</a>
                                    </h4>
                                    <p>
                                        {{ Str::limit($a->content, 150) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center mt-4">
            <div class="col-lg-12">
                <a href="" class="btn btn-outline-secondary">Load more..</a>
            </div>
        </div>
    </div>
</section>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#e9ecef" fill-opacity="1" d="M0,0L17.1,16C34.3,32,69,64,103,101.3C137.1,139,171,181,206,170.7C240,160,274,96,309,106.7C342.9,117,377,203,411,234.7C445.7,267,480,245,514,224C548.6,203,583,181,617,192C651.4,203,686,245,720,229.3C754.3,213,789,139,823,90.7C857.1,43,891,21,926,58.7C960,96,994,192,1029,224C1062.9,256,1097,224,1131,224C1165.7,224,1200,256,1234,245.3C1268.6,235,1303,181,1337,181.3C1371.4,181,1406,235,1423,261.3L1440,288L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z"></path>
</svg>

<section id="contact">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col-lg-12">
                <h1>News Article</h1>
                <hr class="garis">
            </div>
        </div>
        {{-- <form action="" method="post"> --}}
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name..">
                </div>
                <div class="col-lg-6">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email..">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <textarea name="message" id="message" class="form-control" rows="10" placeholder="Message.."></textarea>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-md-12">
                    <button type="button" class="btn btn-outline-secondary">Send!</button>
                </div>
            </div>
        {{-- </form> --}}
    </div>
</section>

<footer class="text-center">
    <hr>
    <p>Presented By &copy; Yoni Widhi {{ date('Y', time()) }}</p>
</footer>

@endsection

@section('script')
<script>
$(document).ready(() => {
    $('.kard').mouseover(function() {
        $(this).addClass('shadow-lg');
    }).mouseleave(function() {
        $(this).removeClass('shadow-lg');
    })
})
</script>
@endsection

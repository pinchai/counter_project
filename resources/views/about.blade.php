<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
    <title>Product</title>
</head>
<body>
<div class="container">
    <div class="row">
        {{--navbar--}}
        @include('navbar')

        <div class="col-12">
            <div class="media">
                <img src="..." class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    <p>Standing on the frontline when the bombs start to fall. Heaven is jealous of our love, angels are
                        crying from up above. Can't replace you with a million rings. Boy, when you're with me I'll give
                        you a taste. There’s no going back. Before you met me I was alright but things were kinda heavy.
                        Heavy is the head that wears the crown.</p>

                    <div class="media mt-3">
                        <a class="mr-3" href="#">
                            <img src="..." alt="...">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            <p>Greetings loved ones let's take a journey. Yes, we make angels cry, raining down on earth
                                from up above. Give you something good to celebrate. I used to bite my tongue and hold
                                my breath. I'm ma get your heart racing in my skin-tight jeans. As I march alone to a
                                different beat. Summer after high school when we first met. You're so hypnotizing, could
                                you be the devil? Could you be an angel? It's time to bring out the big balloons.
                                Thought that I was the exception. Bikinis, zucchinis, Martinis, no weenies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

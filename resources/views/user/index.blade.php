<!DOCTYPE html>
<html lang="zxx">
    <style>
        .class{
            width: 70%;
          height: 150px;
          padding: 12px 20px;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          background-color: #f8f8f8;
          font-size: 16px;
          margin-top: -40px;
          /* resize: none; */
        }
        </style>
@include('user.head')



<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
@include('user.sub_nav')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
 @include('user.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
 @include('user.hero')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
@include('user.categories')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
@include('user.featured_product')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
@include('user.banner')
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    @include('user.latest_product')


    @include('user.top_rated')


    @include('user.review_product')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
   {{-- @include('user.blog_section') --}}
    <!-- Blog Section End -->

    {{-- Comment and reply System Starts Here --}}


    <div style="text-align: center; padding-bottom:20px;" id="center" >
        <h1 style="font-size: 25px; text-align:center; padding:50px; font-weight:">Comment Section</h1>


        <form action="{{ url('add_comment') }}"  method="post">
            @csrf
            <textarea style="" name="comment" class="class" placeholder="Comment Something here" cols="100" id="" ></textarea> <br>
            {{-- <a class="btn btn-primary" href="">Comment</a> --}}
            <input type="submit" name="" class="btn btn-primary" value="Comment">
        </form>
    </div>

    <div style=" margin-left:50px;">
        <h1 style="font-size: 20px; padding-bottom:20px;">All Comment</h1>

    @foreach($comment as $comments)
        <div>
            <b>{{ $comments->name }}</b>
            <p>{{ $comments->comment }}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid=" {{ $comments->id }}" >Reply</a>

            @foreach ($reply as $replys )

            @if($replys->comment_id == $comments->id)

            <div style="padding-left:3%; padding-bottom:10px; padding-bottom:10px; ">

                <b>{{ $replys->name }}</b>
                <p>{{ $replys->reply }}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid=" {{ $comments->id }}" >Reply</a>


            </div>
            @endif

            @endforeach



        </div>
    @endforeach


{{-- Reply text box --}}


        <div style="display: none;" class="replyDiv">

        <form action="{{ url('add_reply') }}" method="POST">
                @csrf

            <input type="text" id="commentId" name="commentId" hidden>
            <textarea placeholder="Write Something Here" name="reply" style="height: 100px; width:400px;"></textarea><br>
            {{-- <a href="javascript::void(0);" class="btn btn-primary">Reply</a> --}}
            <input type="submit" value="Reply" class="btn btn-danger">
            <a href="javascript::void(0);  " class="btn btn-primary" onclick="reply_close(this)">close</a>

        </form>
        </div>

    </div>
<script type="text/javascript">
    function reply(caller)
    {
        document.getElementById('commentId').value=$(caller).attr('data-Commentid')

        $('.replyDiv').insertAfter($(caller));

        $('.replyDiv').show();
    }
    function reply_close(caller)
    {
        // $('.replyDiv').insertAfter($(caller));

        $('.replyDiv').hide();
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>


    <!-- Footer Section Begin -->
 @include('user.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    @include('user.script')


</body>

</html>

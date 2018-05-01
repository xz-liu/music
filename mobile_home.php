<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>MUSIC</title>
    <link href="../Content/bootstrap.css" rel="stylesheet"/>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <meta name="description" content="Music Box by Joker"/>
    <script type="text/javascript" src="../Scripts/jquery-3.1.1.js"></script>
    <script type="text/javascript">
        var song_id_now;
        var switch_bg = true;
        var paused = false;
        var is_mobile = true;
    </script>
    <!--    <script type="text/javascript" src="switchbg.js"></script>-->
    <script src="utilities.js" type="text/javascript"></script>
    <link href="styles.css" media="all" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

</head>
<body id="page_body" class="back_style_phone" >

<div id="album_back" class="back_style_phone moblie_back_style transparent_back_trans" style="z-index: -1;"></div>

<div id="table_layer" onclick="tryShowPlayer()" style="z-index: -1;"></div>
<!--    <canvas id="screen" width="1300" height="700" style="position: fixed;bottom: 0px;left: 0px;z-index:-1 "></canvas>-->
<script type="text/javascript" src="music_ctrl.js"></script>
<nav class="navbar navbar-collapse navbar-dark navbar_effect_mobile" id="navbar">
    <a class="navbar-brand" onclick="hideall()"><h1 >
             <code >MUSIC</code><span id="various_color_title">!</span>
        </h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_collapse"
            aria-controls="navbar_collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon " ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar_collapse">

        <form class="form-inline my-2 my-lg-0" id="submit_form">
            <div class="input-group">
                <input class="form-control mr-sm-2" type="search" name="search" id="uta_name" placeholder="Search songs/artists/albums"
                       aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-outline-success " name="query" id="query" type="submit">Search
                </button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav mr-auto back_laye_3 rounded">
            <li class="nav-item active">
                <button class="nav-link btn btn-link" id="player_link" onclick="showPlayer()" hidden>PLAYER
                    <span class="sr-only">(current)</span></button>
            </li>
            <li class="nav-item active">
                <button class="nav-link btn btn-link" id="album_link" onclick="showAlbum()" hidden>
                    ALBUM
                </button>
            </li>
            <li class="nav-item active">
                <button class="nav-link btn btn-link" id="result_link" onclick="showSearchList()" hidden>
                    LIST
                </button>
            </li>
        </ul>

    </div>
</nav>
<div style="padding-top: 3vh;padding-left: 3vh;padding-right: 3vh">
    <div class="collapse" id="player">
        <div class="card text-white mx-auto shadow_card" style="width: 90%;background-color: transparent;">
            <img class="card-img rounded" alt="Card image" onclick="showLyricsMobile()" id="song_img">
            <div class="card-img-overlay" style="height: 30vh" onclick="showLyricsMobile()">
                <div class="black_layer_5 rounded">
                    <h5 class="card-title " id="song_name"></h5>
                    <hr class="my-1"/>
                    <p class="card-text " id="album_name">
                    </p>
                </div>
            </div>
            <div class="card-body">

                <div class="progress border border-info jilao position-relative"
                     style="height: 5vh;background-color: transparent;" id="music_prog_border"
                     onclick="mouse_progress(event)">
                    <span style='color:white; ' class="justify-content-center d-flex position-absolute w-100" id='prog_span'></span>
                    <div class="progress-bar progress-bar-striped  bg-info progress-bar-animated "
                         id="music_progress"
                         role="progressbar" style="width: 0%;"></div>
                </div>
                <hr class="my-1"/>
                <div class="btn-group btn-block">
                    <button class="btn btn-outline-success player_btn_mobile btn-block" id="simple_player"
                            onclick="playOrPause()">
                        <audio hidden controls id="hoshi_no_uta" loop="loop"
                               style="opacity: 0;z-index: -1;width: 0px;height:0px;">
                            <source id="song_source" type="audio/mpeg">
                        </audio>
                        <div id="playing" class=" mx-auto pause_btn playing_status"></div>
                    </button>
                    <button type="button" class=" btn btn-outline-primary " data-toggle="modal"
                            data-target="#show_result">
                        SHARE
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div style="position: absolute;overflow: visible">
        <div class="collapse" id="song_list" style="width: 90vw;">
        </div>
    </div>
    <div style="height: 70vh;padding-top: 0vh;position:absolute;overflow: hidden;text-align: center;" onclick="showPlayer()">
        <div class="collapse" id="lyric_mobile" style="width: 91vw;" >
        </div>
    </div>
    <div style="position: absolute;overflow: visible; ">
        <div class="collapse" id="album_list">
            <div style='width: 90vw' class="list-group ">
                <a onclick='showPlayer()' class="list-group-item list-group-item-action none_back">
                    <div class='row'>
                        <div class=' col-sm-offset-1 col-sm-3'>
                            <img id="list_album_pic" style='width: 20vh;height: 20vh' class='rounded'/>
                        </div>
                        <div class='col-sm-offset-1 col-sm-6'>
                            <h1 id="list_album_name"></h1>
                            <p id="list_album_company"></p>
                            <p id="list_album_date"></p>
                        </div>
                    </div>
                </a>
            </div>
            <div style='width: 90vw' class="list-group " id="album_list_items">

            </div>
        </div>
    </div>

    <!--    </div>-->
</div>
<div class="modal fade" id="show_result" tabindex="-1" role="dialog" aria-labelledby="show_result" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="result_title">
                    SHARE THIS WEBSITE
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <code>SHARE THIS LINK</code>
                <a id="result_text" style="width: 100%" class="btn btn-outline-danger btn-block" >SHARE LINK</a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="../Scripts/bootstrap.js"></script>

<!--<script src="firestar2.js"></script>-->
<!--<script type="text/javascript">-->
<!--    var fireStar = new FireStars();-->
<!--    fireStar.set(document.getElementById("screen"), 1, 1600);-->
<!--    fireStar.animate();-->
<!--</script>-->
</body>
</html>

<!DOCTYPE html>
<!--[if IE 8 ]> <html class="ie8"> <![endif]-->

<!--[if IE 9 ]> <html class="ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<head>
    <title>注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <link href="css/1140.css" rel="stylesheet" />
    <link href="css/normalize.css" rel="stylesheet" />
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/jquery.idealforms.min.css" rel="stylesheet" media="screen" />
    <link href="css/styles.css" rel="stylesheet" media="all" />
</head>

<body>
    <header>
    <div class="container clearfix">
        <div class="row">
            <div class="twelvecol last">
                <h1 id="title"></h1>
            </div>
        </div>
    </div>
    </header>
    <div id="main">
        <div class="container clearfix">
            <div class="row">
                <div class="eightcol last">
                <!-- Begin Form -->
                    <form id="my-form" action="signupaction.php" method="post" enctype="multipart/form-data">
                        <section name="Step 1">
                            <div>
                                <label>姓名:</label>
                                <input type="text" id="username" name="username" required="required">
                            </div>       
                            <div>
                                <label>密码:</label>
                                <input type="password" id="password" name="password" required="required">
                            </div>
                            <div>
                                <label>重复密码:</label>
                                <input type="password" id="re_password" name="re_password" required="required">
                            </div>
                        </section>
                        <section name="Step 2">
                            <div>
                                <label>性别:</label>
                                <label>
                                    <input type="radio" id="sex" name="sex" value="男" checked>男
                                </label>
                                <label>
                                    <input type="radio" id="sex" name="sex" value="女">女
                                </label>
                            </div>
                            <div>
                                <label>Email:</label>
                                <input type="email" id="email" name="email" required="required">                                           
                            </div>
                            <div>
                                <label>电话号码:</label>
                                <input type="text" id="phone" name="phone" required="required">                        
                            </div>
                        </section>
                        <section name="Step 3">
                            <div>
                                <label>头像:</label>
                                <input type="file" id="file" name="file" required="required">
                            </div>
                        </section>
                        <div>
                            <hr/>
                        </div>
                        <div>
                            <button type="submit">Submit</button>
                            <button id="reset" type="button">Reset</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
<! -- End Main -->
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.idealforms.js"></script>
<script>
    var options = {
        onFail: function () {
            alert($myform.getInvalid().length + ' invalid fields.')
        },
        inputs: {
            'password': {
                filters: 'required pass',
            },
            'username': {
                filters: 'required username',
            },
            'file': {
                filters: 'extension',
            },
        }
    };
    var $myform = $('#my-form').idealforms(options).data('idealforms');
    $('#reset').click(function () { $myform.reset().fresh().focusFirst() });
    $myform.focusFirst();
</script>
<script src="http://www.jq22.com/js/jq.js "></script>
</body>

</html>
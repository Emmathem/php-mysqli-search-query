<? include __DIR__ .'/view/views-stubs/header.php' ?>
        <section class="welcome-page">
            <div class="a-c"></div>

            <div class="col-md-offest-3 col-md-8">
                <div class="wow fadeInDown" data-wow-duration=".9s" data-wow-delay=".4s">
                    <h3 class="wow animated fadeInRight" data-wow-delay=".6s" data-wow-duration="1.3s">What Are You Looking For?</h3>
                </div>
            </div>
            <div class="nav-menu">
                <nav class="navbar" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">

                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </section>
        <section class = "search_form">
            <div class="search_inner">
               <div class = "panel">
               <h3 class = "panel-title">Search Here!</h3>
               <div class = "panel-body">

                    <form action="search" method="post" class="s_form">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3">
                          <div class="form-group">
                            <input type="text" name  = "data" class="form-control" placeholder="Enter your Search Query">
                        </div>

                        <div class = "form-group">
                        <input type="submit" value="Search" name = "search" class="btn btn-search">
                        </div>
                        <a href = "#">View All Available Item</a>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </section>
    <? include __DIR__.'/view/views-stubs/footer.php'; ?>

<template>
    <div>
        <span id="about-us">
            <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>About us</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Pages</a><i class="icon-angle-right"></i></li>
                    <li class="active">About us</li>
                    </ul>
                </div>
                </div>
            </div>
            </section>
            <section id="content">
            <div class="container">
                <div class="row">
                <div class="span6">
                    <h2>Welcome to <strong>Flattern</strong></h2>
                    <p>
                    Ei mel semper vocent persequeris, nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.
                    </p>
                    <p>
                    Iudico definiebas eos ea, dicat inermis hendrerit vel ei, legimus copiosae quo at. Per utinam corrumpit prodesset te, liber praesent eos an. An prodesset neglegentur qui, usu ancillae posidonium in, mea ex eros animal scribentur. Et simul fabellas sit.
                    Populo inimicus ne est.
                    </p>
                    <p>
                    Alii wisi phaedrum quo te, duo cu alia neglegentur. Quo nonumy detraxit cu, viderer reformidans ut eos, lobortis euripidis posidonium et usu. Sed meis bonorum minimum cu, stet aperiam qualisque eu vim, vide luptatum ei nec. Ei nam wisi labitur mediocrem.
                    Nam saepe appetere ut, veritus graecis minimum no vim. Vidisse impedit id per.
                    </p>
                </div>
                <div class="span6">
                    <!-- start flexslider -->
                    <div class="flexslider">
                    <ul class="slides">
                        <li>
                        <img :src="`assets/public/assets/img/works/full/image-01-full.jpg`" alt="" />
                        </li>
                        <li>
                        <img :src="`assets/public/assets/img/works/full/image-02-full.jpg`" alt="" />
                        </li>
                        <li>
                        <img :src="`assets/public/assets/img/works/full/image-03-full.jpg`" alt="" />
                        </li>
                    </ul>
                    </div>
                    <!-- end flexslider -->
                </div>
                </div>
                <!-- divider -->
                <!-- end divider -->
                <!-- divider -->
                <div class="row">
                <div class="span12">
                    <div class="solidline">
                    </div>
                </div>
                </div>
                <!-- end divider -->
            </div>
            </section>
        </span>
    </div>
</template>

<script>
export default {
    name: "AboutUs"
}
</script>

<style scoped>
    .btn-theme {
        border: 1px solid #F03C02;
        background: #F03C02;
    }
    .btn-theme:hover {
        border: 1px solid #333333;
        background: #333333;
    }
</style>

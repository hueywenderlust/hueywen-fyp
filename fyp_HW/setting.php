<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 5:59 PM
 */
?>

<?php include ('inc/sidebar.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <h1>Settings</h1>
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <div class="form-group col-md-12">
            <h3>Themes</h3>
            <p>theme colors</p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <a href="#" data-theme="chiller-theme" class="theme chiller-theme selected"></a>
            <a href="#" data-theme="ice-theme" class="theme ice-theme"></a>
            <a href="#" data-theme="cool-theme" class="theme cool-theme"></a>
            <a href="#" data-theme="light-theme" class="theme light-theme"></a>
        </div>
        <div class="form-group col-md-12">
            <p>background image </p>
        </div>
        <div class="form-group col-md-12">
            <a href="#" data-bg="bg1" class="theme theme-bg selected"></a>
            <a href="#" data-bg="bg2" class="theme theme-bg"></a>
            <a href="#" data-bg="bg3" class="theme theme-bg"></a>
            <a href="#" data-bg="bg4" class="theme theme-bg"></a>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" id="toggle-bg" checked>
                    Background image
                </label>
            </div>
        </div>

    </div>

    <hr>

</div>

<footer class="bottom">
    <section class="footer-section float-right">
        SunU Experts | 2018 &copy hueywen  &nbsp;
    </section>
</footer>

<style>
    .footer-section {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: darkslategrey;
        color: white;
        text-align: right;
</style>
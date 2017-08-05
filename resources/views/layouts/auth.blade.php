<?php 
	//$system = \App\System::all()->first(); 
?>
<!DOCTYPE html>
<html>

@include('layouts.partials.htmlheader')

<style>
    .content-wrapper-login {
        background: url('{{ asset( 'img/background.jpg' ) }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

@yield('content')

</html>
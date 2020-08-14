@extends('layouts.master')
@section('title')
   Training
@endsection


@section('content')
<style>
html {
    font-family: sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%
}

body {
    margin: 0
}



.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit
}

.h1 .small,
.h1 small,
.h2 .small,
.h2 small,
.h3 .small,
.h3 small,
.h4 .small,
.h4 small,
.h5 .small,
.h5 small,
.h6 .small,
.h6 small,
h1 .small,
h1 small,
h2 .small,
h2 small,
h3 .small,
h3 small,
h4 .small,
h4 small,
h5 .small,
h5 small,
h6 .small,
h6 small {
    font-weight: 400;
    line-height: 1;
    color: #999
}

.h1,
.h2,
.h3,
h1,
h2,
h3 {
    margin-top: 20px;
    margin-bottom: 10px
}

.h1 .small,
.h1 small,
.h2 .small,
.h2 small,
.h3 .small,
.h3 small,
h1 .small,
h1 small,
h2 .small,
h2 small,
h3 .small,
h3 small {
    font-size: 65%
}

.h4,
.h5,
.h6,
h4,
h5,
h6 {
    margin-top: 10px;
    margin-bottom: 10px
}

.h4 .small,
.h4 small,
.h5 .small,
.h5 small,
.h6 .small,
.h6 small,
h4 .small,
h4 small,
h5 .small,
h5 small,
h6 .small,
h6 small {
    font-size: 75%
}

.h1,
h1 {
    font-size: 36px
}

.h2,
h2 {
    font-size: 30px
}

.h3,
h3 {
    font-size: 24px
}

.h4,
h4 {
    font-size: 18px
}

.h5,
h5 {
    font-size: 14px
}

.h6,
h6 {
    font-size: 12px
}

p {
    margin: 0 0 10px
}



.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto
   
}

@media(min-width:768px) {
    .container {
        width: 750px
        
    }
}

@media(min-width:992px) {
    .container {
        width: 970px
    }
}

@media(min-width:1200px) {
    .container {
        width: 1170px
        
    }
}

.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto
}

.row {
    margin-right: -15px;
    margin-left: -15px
}

.col-lg-1,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-md-1,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-sm-1,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-xs-1,
.col-xs-10,
.col-xs-11,
.col-xs-12,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px
}

.col-xs-1,
.col-xs-10,
.col-xs-11,
.col-xs-12,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9 {
    float: left
}

.col-xs-12 {
    width: 100%
}

.col-xs-11 {
    width: 91.66666667%
}

.col-xs-10 {
    width: 83.33333333%
}

.col-xs-9 {
    width: 75%
}

.col-xs-8 {
    width: 66.66666667%
}

.col-xs-7 {
    width: 58.33333333%
}

.col-xs-6 {
    width: 50%
}

.col-xs-5 {
    width: 41.66666667%
}

.col-xs-4 {
    width: 33.33333333%
}

.col-xs-3 {
    width: 25%
}

.col-xs-2 {
    width: 16.66666667%
}

.col-xs-1 {
    width: 8.33333333%
}

.col-xs-pull-12 {
    right: 100%
}

.col-xs-pull-11 {
    right: 91.66666667%
}

.col-xs-pull-10 {
    right: 83.33333333%
}

.col-xs-pull-9 {
    right: 75%
}

.col-xs-pull-8 {
    right: 66.66666667%
}

.col-xs-pull-7 {
    right: 58.33333333%
}

.col-xs-pull-6 {
    right: 50%
}

.col-xs-pull-5 {
    right: 41.66666667%
}

.col-xs-pull-4 {
    right: 33.33333333%
}

.col-xs-pull-3 {
    right: 25%
}

.col-xs-pull-2 {
    right: 16.66666667%
}

.col-xs-pull-1 {
    right: 8.33333333%
}

.col-xs-pull-0 {
    right: 0
}

.col-xs-push-12 {
    left: 100%
}

.col-xs-push-11 {
    left: 91.66666667%
}

.col-xs-push-10 {
    left: 83.33333333%
}

.col-xs-push-9 {
    left: 75%
}

.col-xs-push-8 {
    left: 66.66666667%
}

.col-xs-push-7 {
    left: 58.33333333%
}

.col-xs-push-6 {
    left: 50%
}

.col-xs-push-5 {
    left: 41.66666667%
}

.col-xs-push-4 {
    left: 33.33333333%
}

.col-xs-push-3 {
    left: 25%
}

.col-xs-push-2 {
    left: 16.66666667%
}

.col-xs-push-1 {
    left: 8.33333333%
}

.col-xs-push-0 {
    left: 0
}

.col-xs-offset-12 {
    margin-left: 100%
}

.col-xs-offset-11 {
    margin-left: 91.66666667%
}

.col-xs-offset-10 {
    margin-left: 83.33333333%
}

.col-xs-offset-9 {
    margin-left: 75%
}

.col-xs-offset-8 {
    margin-left: 66.66666667%
}

.col-xs-offset-7 {
    margin-left: 58.33333333%
}

.col-xs-offset-6 {
    margin-left: 50%
}

.col-xs-offset-5 {
    margin-left: 41.66666667%
}

.col-xs-offset-4 {
    margin-left: 33.33333333%
}

.col-xs-offset-3 {
    margin-left: 25%
}

.col-xs-offset-2 {
    margin-left: 16.66666667%
}

.col-xs-offset-1 {
    margin-left: 8.33333333%
}

.col-xs-offset-0 {
    margin-left: 0
}

@media(min-width:768px) {
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9 {
        float: left
    }
    .col-sm-12 {
        width: 100%
    }
    .col-sm-11 {
        width: 91.66666667%
    }
    .col-sm-10 {
        width: 83.33333333%
    }
    .col-sm-9 {
        width: 75%
    }
    .col-sm-8 {
        width: 66.66666667%
    }
    .col-sm-7 {
        width: 58.33333333%
    }
    .col-sm-6 {
        width: 50%
    }
    .col-sm-5 {
        width: 41.66666667%
    }
    .col-sm-4 {
        width: 33.33333333%
    }
    .col-sm-3 {
        width: 25%
    }
    .col-sm-2 {
        width: 16.66666667%
    }
    .col-sm-1 {
        width: 8.33333333%
    }
    .col-sm-pull-12 {
        right: 100%
    }
    .col-sm-pull-11 {
        right: 91.66666667%
    }
    .col-sm-pull-10 {
        right: 83.33333333%
    }
    .col-sm-pull-9 {
        right: 75%
    }
    .col-sm-pull-8 {
        right: 66.66666667%
    }
    .col-sm-pull-7 {
        right: 58.33333333%
    }
    .col-sm-pull-6 {
        right: 50%
    }
    .col-sm-pull-5 {
        right: 41.66666667%
    }
    .col-sm-pull-4 {
        right: 33.33333333%
    }
    .col-sm-pull-3 {
        right: 25%
    }
    .col-sm-pull-2 {
        right: 16.66666667%
    }
    .col-sm-pull-1 {
        right: 8.33333333%
    }
    .col-sm-pull-0 {
        right: 0
    }
    .col-sm-push-12 {
        left: 100%
    }
    .col-sm-push-11 {
        left: 91.66666667%
    }
    .col-sm-push-10 {
        left: 83.33333333%
    }
    .col-sm-push-9 {
        left: 75%
    }
    .col-sm-push-8 {
        left: 66.66666667%
    }
    .col-sm-push-7 {
        left: 58.33333333%
    }
    .col-sm-push-6 {
        left: 50%
    }
    .col-sm-push-5 {
        left: 41.66666667%
    }
    .col-sm-push-4 {
        left: 33.33333333%
    }
    .col-sm-push-3 {
        left: 25%
    }
    .col-sm-push-2 {
        left: 16.66666667%
    }
    .col-sm-push-1 {
        left: 8.33333333%
    }
    .col-sm-push-0 {
        left: 0
    }
    .col-sm-offset-12 {
        margin-left: 100%
    }
    .col-sm-offset-11 {
        margin-left: 91.66666667%
    }
    .col-sm-offset-10 {
        margin-left: 83.33333333%
    }
    .col-sm-offset-9 {
        margin-left: 75%
    }
    .col-sm-offset-8 {
        margin-left: 66.66666667%
    }
    .col-sm-offset-7 {
        margin-left: 58.33333333%
    }
    .col-sm-offset-6 {
        margin-left: 50%
    }
    .col-sm-offset-5 {
        margin-left: 41.66666667%
    }
    .col-sm-offset-4 {
        margin-left: 33.33333333%
    }
    .col-sm-offset-3 {
        margin-left: 25%
    }
    .col-sm-offset-2 {
        margin-left: 16.66666667%
    }
    .col-sm-offset-1 {
        margin-left: 8.33333333%
    }
    .col-sm-offset-0 {
        margin-left: 0
    }
}

@media(min-width:992px) {
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9 {
        float: left
    }
    .col-md-12 {
        width: 100%
    }
    .col-md-11 {
        width: 91.66666667%
    }
    .col-md-10 {
        width: 83.33333333%
    }
    .col-md-9 {
        width: 75%
    }
    .col-md-8 {
        width: 66.66666667%
    }
    .col-md-7 {
        width: 58.33333333%
    }
    .col-md-6 {
        width: 50%
    }
    .col-md-5 {
        width: 41.66666667%
    }
    .col-md-4 {
        width: 33.33333333%
    }
    .col-md-3 {
        width: 25%
    }
    .col-md-2 {
        width: 16.66666667%
    }
    .col-md-1 {
        width: 8.33333333%
    }
    .col-md-pull-12 {
        right: 100%
    }
    .col-md-pull-11 {
        right: 91.66666667%
    }
    .col-md-pull-10 {
        right: 83.33333333%
    }
    .col-md-pull-9 {
        right: 75%
    }
    .col-md-pull-8 {
        right: 66.66666667%
    }
    .col-md-pull-7 {
        right: 58.33333333%
    }
    .col-md-pull-6 {
        right: 50%
    }
    .col-md-pull-5 {
        right: 41.66666667%
    }
    .col-md-pull-4 {
        right: 33.33333333%
    }
    .col-md-pull-3 {
        right: 25%
    }
    .col-md-pull-2 {
        right: 16.66666667%
    }
    .col-md-pull-1 {
        right: 8.33333333%
    }
    .col-md-pull-0 {
        right: 0
    }
    .col-md-push-12 {
        left: 100%
    }
    .col-md-push-11 {
        left: 91.66666667%
    }
    .col-md-push-10 {
        left: 83.33333333%
    }
    .col-md-push-9 {
        left: 75%
    }
    .col-md-push-8 {
        left: 66.66666667%
    }
    .col-md-push-7 {
        left: 58.33333333%
    }
    .col-md-push-6 {
        left: 50%
    }
    .col-md-push-5 {
        left: 41.66666667%
    }
    .col-md-push-4 {
        left: 33.33333333%
    }
    .col-md-push-3 {
        left: 25%
    }
    .col-md-push-2 {
        left: 16.66666667%
    }
    .col-md-push-1 {
        left: 8.33333333%
    }
    .col-md-push-0 {
        left: 0
    }
    .col-md-offset-12 {
        margin-left: 100%
    }
    .col-md-offset-11 {
        margin-left: 91.66666667%
    }
    .col-md-offset-10 {
        margin-left: 83.33333333%
    }
    .col-md-offset-9 {
        margin-left: 75%
    }
    .col-md-offset-8 {
        margin-left: 66.66666667%
    }
    .col-md-offset-7 {
        margin-left: 58.33333333%
    }
    .col-md-offset-6 {
        margin-left: 50%
    }
    .col-md-offset-5 {
        margin-left: 41.66666667%
    }
    .col-md-offset-4 {
        margin-left: 33.33333333%
    }
    .col-md-offset-3 {
        margin-left: 25%
    }
    .col-md-offset-2 {
        margin-left: 16.66666667%
    }
    .col-md-offset-1 {
        margin-left: 0
    }
    .col-md-offset-0 {
        margin-left: 0
    }
}

@media(min-width:1200px) {
    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9 {
        float: left
    }
    .col-lg-12 {
        width: 100%
    }
    .col-lg-11 {
        width: 91.66666667%
    }
    .col-lg-10 {
        width: 83.33333333%
    }
    .col-lg-9 {
        width: 75%
    }
    .col-lg-8 {
        width: 66.66666667%
    }
    .col-lg-7 {
        width: 58.33333333%
    }
    .col-lg-6 {
        width: 50%
    }
    .col-lg-5 {
        width: 41.66666667%
    }
    .col-lg-4 {
        width: 33.33333333%
    }
    .col-lg-3 {
        width: 25%
    }
    .col-lg-2 {
        width: 16.66666667%
    }
    .col-lg-1 {
        width: 8.33333333%
    }
    .col-lg-pull-12 {
        right: 100%
    }
    .col-lg-pull-11 {
        right: 91.66666667%
    }
    .col-lg-pull-10 {
        right: 83.33333333%
    }
    .col-lg-pull-9 {
        right: 75%
    }
    .col-lg-pull-8 {
        right: 66.66666667%
    }
    .col-lg-pull-7 {
        right: 58.33333333%
    }
    .col-lg-pull-6 {
        right: 50%
    }
    .col-lg-pull-5 {
        right: 41.66666667%
    }
    .col-lg-pull-4 {
        right: 33.33333333%
    }
    .col-lg-pull-3 {
        right: 25%
    }
    .col-lg-pull-2 {
        right: 16.66666667%
    }
    .col-lg-pull-1 {
        right: 8.33333333%
    }
    .col-lg-pull-0 {
        right: 0
    }
    .col-lg-push-12 {
        left: 100%
    }
    .col-lg-push-11 {
        left: 91.66666667%
    }
    .col-lg-push-10 {
        left: 83.33333333%
    }
    .col-lg-push-9 {
        left: 75%
    }
    .col-lg-push-8 {
        left: 66.66666667%
    }
    .col-lg-push-7 {
        left: 58.33333333%
    }
    .col-lg-push-6 {
        left: 50%
    }
    .col-lg-push-5 {
        left: 41.66666667%
    }
    .col-lg-push-4 {
        left: 33.33333333%
    }
    .col-lg-push-3 {
        left: 25%
    }
    .col-lg-push-2 {
        left: 16.66666667%
    }
    .col-lg-push-1 {
        left: 8.33333333%
    }
    .col-lg-push-0 {
        left: 0
    }
    .col-lg-offset-12 {
        margin-left: 100%
    }
    .col-lg-offset-11 {
        margin-left: 91.66666667%
    }
    .col-lg-offset-10 {
        margin-left: 83.33333333%
    }
    .col-lg-offset-9 {
        margin-left: 75%
    }
    .col-lg-offset-8 {
        margin-left: 66.66666667%
    }
    .col-lg-offset-7 {
        margin-left: 58.33333333%
    }
    .col-lg-offset-6 {
        margin-left: 50%
    }
    .col-lg-offset-5 {
        margin-left: 41.66666667%
    }
    .col-lg-offset-4 {
        margin-left: 33.33333333%
    }
    .col-lg-offset-3 {
        margin-left: 25%
    }
    .col-lg-offset-2 {
        margin-left: 16.66666667%
    }
    .col-lg-offset-1 {
        margin-left: 8.33333333%
    }
    .col-lg-offset-0 {
        margin-left: 0
    }
}



html {
    font-size: 100%
}


body {
    font-size: 14px;
    font-size: .875rem;
    font-family: Lato;
    font-weight: 400;
    color: #333;
    height: 100%;
    line-height: 1.38em;
    position: relative;
    width: 100%
}



.strong {
    font-weight: 700
}

.first-word {
    color: #ff9a04;
    font-weight: 700
}

p {
    text-align: justify;
    padding-bottom: 15px;
    font-size: 16px;
    font-size: 1rem;
    line-height: 1.4em
}

h1 {
    font-size: 30px;
    font-size: 1.875rem;
    padding-bottom: 10px;
    line-height: 1.3em
}

h2 {
    font-size: 26px;
    font-size: 1.625rem;
    padding-bottom: 10px;
    line-height: 1.3em
}

h3 {
    font-size: 22px;
    font-size: 1.375rem;
    padding-bottom: 10px;
    line-height: 1.3em
}

h4 {
    font-size: 20px;
    font-size: 1.25rem;
    padding-bottom: 10px;
    line-height: 1.3em
}

h5 {
    font-size: 16px;
    font-size: 1rem;
    padding-bottom: 10px;
    line-height: 1.3em
}

h6 {
    font-size: 14px;
    font-size: .875rem;
    padding-bottom: 10px;
    line-height: 1.3em
}



.gn-content {
    position: relative;
    padding: 50px 0
}

.gn-content .content-row {
    position: relative;
    padding-bottom: 50px
}

.gn-content .content-row:last-child {
    padding-bottom: 0
}

.gn-content .content-row h1 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h1:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-content .content-row h2 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h2:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-content .content-row h3 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h3:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-content .content-row h4 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h4:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-content .content-row h5 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h5:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-content .content-row h6 {
    color: #2f506c;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 15px;
    padding: 5px 0 5px 20px;
    position: relative
}

.gn-content .content-row h6:before {
    background-color: #ff9a04;
    content: "";
    top: 0;
    left: 0;
    bottom: 0;
    position: absolute;
    width: 5px
}

.gn-artical-details {
    position: relative
}

.gn-artical-details .artical-header {
    position: relative;
    margin-bottom: 30px
}

.gn-artical-details .artical-header .artical-title {
    font-size: 32px;
    font-size: 2rem;
    font-weight: 700;
    color: #2f506c;
    border-bottom: 1px solid #b3b3b3;
    line-height: 1.6em;
    padding-bottom: 15px;
    margin-bottom: 15px
}
.bg-light-gray {
    background-color: #f5f6f8;
}

</style>
    <div class="page-section">
    <div class="container" style="padding: 30px;">
        <div class="row">
            <div class="section-row">
                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                    <div class="side-header">
                        <h2><img src="http://hamrojobs.com.np/settings/setting1545018251.png" alt="Flowers in Chania"></h2>
                        <h4></h4> </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                   <p>When it comes to scaling your business, customer and partner training should be at the forefront of your mind. Your company can have the greatest product or service around but it won’t matter if the learning curve is so steep that adoption is difficult. </p>
                    <p>We are a professional, enthusiastic and innovative team, dedicated to providing professional HR Consulting Services and evolving Recruitment Solutions that help our customers become more productive and profitable.</p>

            </div>      
            </div>
        </div>
    </div>
</div>
<div class="page-section bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="gn-content">
                <div class="content-row">
                    <h2>Available Trainings:</h2>
                    <p></p>
                    <h4>1. Bookkeeping<span style="margin-left: 20px;"><a href="" target="_blank"><i class="fa fa-download"></i></a></span></h4>
                    <p>=> Accounting Concepts and Types of Accounting
<br>=> Golden Rules of Accounting (Modern and Traditional)
<br>=> Overhead Cost (Charts of Account)
<br>=> Listing of Incomes, Asset and Liabilities
<br>=> Introduction on types of Journal Voucher
<br>=> Maintaining Purchase and Purchase Return Book
<br>=> Preparation of Sales Book and Sales return Book
<br>=> Posting Cash receipt entries, payment voucher
<br>=> Petty Cash Book</p> 

<h4>2. Accounting Software<span style="margin-left: 20px;"><a href="" target="_blank"><i class="fa fa-download"></i></a></span></h4>
                    <p>=> Basic Information of Software
<br>=> Creating Contact, Companies in tally software
<br>=> Posting Purchase Invoice, sales invoice, Journal Vouchers
<br>=> Extracting Financial Statement from Software

<h4>3. Reporting & Analysis<span style="margin-left: 20px;"><a href="" target="_blank"><i class="fa fa-download"></i></a></span></h4>
                    <p>=> Bank Reconciliation Statement
                    <br>=> Calculation of Depreciation
                    <br>=> Preparation of Income Statement
                    <br>=> Preparation of Balance sheet
                    <br>=> Ratio Analysis</p>
<h4>4. Tax & Vat<span style="margin-left: 20px;"><a href="" target="_blank"><i class="fa fa-download"></i></a></span></h4>
                    <p>=> Introduction of Tax and Vat
                    <br>=> Tax Rates applicable in Nepal
                    <br>=> Tax deduction at sources
                    <br>=> Tax filing
                    <br>=> Vat Filing
<br>=> Estimated Tax return
<br>=> Fine and Penalty as per income tax act
<br>=> Preparation of Salary Sheet</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-section bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="gn-content">
                <div class="content-row">
                    <h2>Training Delivery Methods</h2>
                    <p></p>
                    <h4>i.<strong>&nbsp;Classroom / On-Premises</strong></h4>
                    <p> </p>
                    <h4>ii.&nbsp;<strong>Live Virtual /Online</strong></h4>
                    <p>With our Live Online training courses, we have been able to provide similar learning experience as our on location classroom based courses. With growing demand, use and objective to meet the requirements of our out of valley and international students, we decided to initiate live online training and have been successfully providing the service since four years. With the inception of Broadway Infosys USA in United States of America, our online training trend has increased with greater extent. With live online courses, you directly learn from and interact with a live expert instructor from your convenient location and can get to involve in discussions, practice, assignments and get to know your progress throughout the course.</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
   

@endsection


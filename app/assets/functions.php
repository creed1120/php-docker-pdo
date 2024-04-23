<?php

function data_filter_css() {
    echo '
        <style>
            @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
            
            .form-control {
                appearance: none;
            }
            .form-group select {
                --moz-appearance: none;
                --webkit-appearance: none;
                appearance: none;
                background: url(https://legacyportal.legacytraditional.org/images/arrow-down_6423873.png) 95% / 8% no-repeat;
            }
            .alert-success {
                position: absolute !important;
                width: 20%;
                text-align: center;
                left: 20px;
                bottom: 0;
            }
        </style>
    ';
}
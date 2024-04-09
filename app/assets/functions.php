<?php

function data_filter_css() {
    echo '
        <style>
            .form-control {
                appearance: none;
            }
            .form-group select {
                --moz-appearance: none;
                --webkit-appearance: none;
                appearance: none;
                background: url(https://legacyportal.legacytraditional.org/images/arrow-down_6423873.png) 95% / 8% no-repeat;
            }
        </style>
    ';
}
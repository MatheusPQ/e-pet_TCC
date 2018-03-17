<?php

function isPetshop() {
    return Auth::user()->nivel == 2 ? true : false;
}
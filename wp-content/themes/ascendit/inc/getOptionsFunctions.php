<?php
use Flynt\Utils\Options;
function getCodeSnippets() {
    return Options::getGlobal('CodeSnippets');
}
function getContactOptions() {
    return Options::getGlobal('ContactInfo');
}
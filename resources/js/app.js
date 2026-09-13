import "./bootstrap";

import "./echo";

import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

import $ from "jquery";

window.Echo.channel("products").listen(".product.created", (event) => {
    console.log("New Product Created:", event);

    alert(`New Product Created: ${event.product.name}`);
});

window.$ = $;
window.jQuery = $;

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

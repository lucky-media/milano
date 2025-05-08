import AsyncAlpine from "async-alpine";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import screen from "@victoryoalli/alpinejs-screen";
import collapse from "@alpinejs/collapse";
import focus from "@alpinejs/focus";
import { Shipping } from "./core/";

window.Alpine = Alpine;

AsyncAlpine.init(Alpine);
AsyncAlpine.data("slider", () => import("./core/Slider.js")).start();

/* Alpine Plugins */
Alpine.plugin(focus);
Alpine.plugin(screen);
Alpine.plugin(collapse);

/* Alpine Data Stores */
Alpine.data("shipping", Shipping);

Livewire.start();

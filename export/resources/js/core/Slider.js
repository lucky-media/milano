import Splide from "@splidejs/splide";

export default function Slider(id, config) {
    // These are the default Splide Slider options.
    // If you wish to add anything custom, when you import the Slider, you can pass in an object with custom options

    const defaultOptions = {
        flickPower: 500,
        perPage: 4,
        perMove: 1,
        gap: "24px",
        rewind: true,
        arrows: false,
        pagination: true,
        classes: {
            pagination: "custom-pagination",
            page: "custom-pagination-page",
        },
        breakpoints: {
            768: {
                perPage: 1,
            },
            1280: {
                perPage: 2,
            },
        },
    };

    const options = { ...defaultOptions, ...config };

    return {
        init() {
            if (id !== "main-carousel") {
                return new Splide(`#${id}`, options).mount(); // Initialize slider(s) dynamically
            }

            return this.thumbnailCarousel();
        },

        thumbnailCarousel() {
            const thumbnailCarousel = new Splide("#thumbnail-carousel", {
                fixedWidth: 80,
                fixedHeight: "auto",
                gap: 8,
                perPage: 0,
                rewind: true,
                pagination: false,
                isNavigation: true,
                arrows: true,
                classes: {
                    pagination: "custom-pagination",
                    page: "custom-pagination-page",
                },
                breakpoints: {
                    1024: {
                        pagination: true,
                        fixedWidth: "auto",
                        fixedHeight: "auto",
                    },
                },
            });

            new Splide("#main-carousel", {
                rewind: false,
                drag: false,
                pagination: false,
                arrows: false,
                perPage: 0,
            })
                .sync(thumbnailCarousel)
                .mount();

            const numImages = document.querySelectorAll(
                "#thumbnail-carousel .splide__slide"
            ).length;

            if (numImages <= 1) {
                document.getElementById("thumbnail-carousel").style.display =
                    "none";
            } else {
                thumbnailCarousel.mount();
            }
        },
    };
}

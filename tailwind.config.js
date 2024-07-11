const { fontFamily } = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/**/*.antlers.html",
        "./resources/**/*.blade.php",
        "./content/**/*.md",
    ],
    theme: {
        container: {
            center: true,
            padding: "1rem",
        },
        extend: {
            fontFamily: {
                sans: ["GeneralSans-Variable", ...fontFamily.sans],
            },
            colors: {
                primary: {
                    100: "#F6F6F6",
                    200: "#EBEBEB",
                    300: "#DEE0E1",
                    400: "#CCCFD1",
                    500: "#BBBFC3",
                    600: "#98A0A9",
                    700: "#858B92",
                    800: "#6A7077",
                    900: "#363B44",
                    950: "#010817",
                },
                secondary: {
                    100: "#E6E7F4",
                    200: "#CDCFE9",
                    500: "#8187C7",
                    700: "#4F58B1",
                    900: "#031090",
                },
                red: {
                    200: "#FDE0E0",
                    400: "#FBC1C1",
                    600: "#FAA2A2",
                    800: "#F88383",
                    900: "#F36A6A",
                },
                green: {
                    200: "#D1F4E7",
                    400: "#A3E8CF",
                    600: "#74DDB7",
                    800: "#46D19F",
                    900: "#18C687",
                },
            },
        },
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("@tailwindcss/forms"),

        // eslint-disable-next-line no-undef
        require("tailwindcss-debug-screens"),
    ],
};

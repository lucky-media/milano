const Shipping = () => ({
    isSubmitting: false,

    useShippingAddressForBilling: true,
    shippingCountry: "US",
    billingCountry: "US",

    get shippingRegionOptions() {
        return window.regions.filter(
            (region) => region.country_iso === this.shippingCountry
        );
    },

    get billingRegionOptions() {
        return window.regions.filter(
            (region) => region.country_iso === this.billingCountry
        );
    },

    submit() {
        this.isSubmitting = true;

        this.$el.querySelector("button").disabled = true;
        this.$el.querySelector("button").classList.add("opacity-50");

        this.$el.submit();
    },
});

export default Shipping;

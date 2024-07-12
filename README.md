# 🛍️ Milano - E-Commerce Starter Kit

Milano is a complete solution for building dynamic and visually appealing e-commerce websites with Statamic. Using the power of the [Simple Commerce]([url](https://statamic.com/addons/duncanmcclean/simple-commerce)) addon, Milano offers a wide range of sets, enabling you to create a variety of unique online store layouts. From showcasing featured products and categories to constructing an entire product catalog with pagination, Milano has everything you need to launch your e-commerce platform with ease.

> Note: Milano requires the installation of [Simple Commerce](https://statamic.com/addons/duncanmcclean/simple-commerce) addon to function properly.

## Why choose Milano for your e-commerce project?

Milano is designed to be **user-friendly** and **highly customizable**, allowing you to manage your e-commerce site directly from the Statamic **control panel** without touching a line of code. The Starter Kit is also **mobile-responsive**, ensuring your online store looks great on any device. Plus, with **Stripe integration**, setting up a checkout process is straightforward and secure.

## Features of Milano

-   A rich selection of sets for building your e-commerce site:
    -   Hero Section
    -   FAQ Section
    -   Featured Products Section
    -   Featured Categories (3 variants)
    -   Multiple Features Section
    -   Testimonial Section
    -   Form Builder
    -   Stats Section
    -   Team Section
    -   Products List with Pagination
-   Dedicated e-commerce pages:
    -   Checkout Page
    -   Cart Page
    -   Product Show Page
-   Advanced Search for Products
-   Product Filters
-   Smooth **Stripe** checkout integration
-   Easy customization with **Tailwind CSS**
-   **Responsive** design for optimal mobile and desktop viewing
-   Pre-built components for efficient site construction
-   **SEO** optimized for better search engine visibility

## Installation

Follow the [Starter Kit installation instructions](https://statamic.dev/starter-kits/installing-a-starter-kit) to get started with Milano.
Make sure you're running **Statamic 5.x** for compatibility.

### Installing into an existing site

```bash
php please starter-kit:install lucky-media/milano
```

### Installing via the Statamic CLI Tool

If you have the [Statamic CLI Tool](https://github.com/statamic/cli) installed, create a new Statamic installation with Milano in one command:

```bash
statamic new my-e-commerce-site lucky-media/milano
```

## Configuration

Milano is created to be ready-to-use out of the box. Access the control panel to begin customizing your e-commerce site. We ensure Milano will remain up-to-date with future Statamic releases.

### Content

Milano comes pre-configured with essential e-commerce pages and components, allowing you to focus on adding your products and content. Use our sets to highlight featured products, answer customer FAQs, and introduce your team.

If you need to support another language it's as easy as changing your locale on config `app.locale` and then translating the content of `lang/en.json` to the desired language.

### Checkout and Payment

Milano integrates with Stripe for secure payment processing. You can easily switch the providers with Simple Commerce.

#### Obtaining Stripe Keys

1.  Create a Stripe Account: If you haven't already, sign up for a Stripe account at [Stripe's](https://stripe.com/) website.
2.  Access Developer Dashboard: Once logged in, navigate to the Developer Dashboard.
3.  Retrieve Test and Live Keys: In the dashboard, you'll find your Test (for development) and Live (for production) API keys. Copy these keys.
4.  Update the keys on the env file

```
STRIPE_KEY=your_stripe_api_key
STRIPE_SECRET=your_stripe_api_secret
```

### Styling

Milano's design is powered by TailwindCSS, giving you the freedom to tailor the look and feel of your e-commerce site with ease. Modify the Tailwind config file to adjust colors, fonts, and more.

## Compiling Assets

Use Vite with [Laravel](https://laravel.com/docs/11.x/vite) for asset compilation in Milano.

-   Run `npm install` to install dependencies.
-   Use `npm run dev` for development.
-   Execute `npm run build` for production-ready assets.

## Commercial Starter Kit

Milano is a commercial starter kit - a license must be purchased via the [Statamic Marketplace](https://statamic.com/starter-kits/lucky-media/milano) to use it in your project.

## 🐞 Bugs and 💡 Feature Requests

For any issues or suggestions, please use the issues tab.

## Credits

Milano is created by the talented team at [Lucky Media](https://www.luckymedia.dev/). We specialize in crafting exceptional digital experiences. Contact us for any web design or development projects.

Special thanks to the creators/contributors of Simple Commerce and other packages that make Milano possible:

-   Statamic CMS
-   Simple Commerce
-   Tailwind CSS
-   Alpine.js
-   Livewire

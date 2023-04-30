<template>
    <div id="my-gallery" style="max-width:80%;margin:auto">
    </div>
</template>

<script type="text/javascript" src="https://product-gallery.cloudinary.com/all.js">


// export default {
    // name: "Gallery",
    // computed: {
        // rend() {
            const myGallery= cloudinary.galleryWidget({
            container: "#my-gallery",
            cloudName: "demo",
            mediaAssets: [
                {tag: "electric_car_product_gallery_demo"}, // by default mediaType: "image"
                {tag: "electric_car_product_gallery_demo", mediaType: "video"}, 
                {tag: "electric_car_360_product_gallery_demo", mediaType: "spin"}
            ]
            });

            myGallery.render();
//         }
//     }
// }
</script>
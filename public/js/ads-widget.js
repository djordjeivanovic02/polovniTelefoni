function createWidget(data, i){

    var productData = {
        imageUrl: data['main-image'],
        title: data['adsTitle'],
        rating: data['rates'],
        ratingCount: data['ratesCount'],
        oldPrice: "100.00",
        newPrice: data['price'],
        brand: data['brand'],
        model: data['model'],
        description: data['description'].replace(/<[^>]*>/g, "").substring(0, 100) + '...',
        images: data['images'],
        username: data['creatorUsername']
    };
    
    var productHtml = `
        <div class="product-wrapper product-type-1">
            <div class="product-content">
                <div class="thumbnail-wrapper">
                    <div class="product-badges">
                        <span class="badge onsale">11%</span>
                    </div>
                    <a href="">
                        <div class="product-card">
                            <div class="hover-slider-image-toggler">
                                <div class="hover-slider-toggle-panel" data-hover-slider-image="${productData.imageUrl}" data-hover-slider-i="1"></div>
                                <div class="hover-slider-toggle-panel" data-hover-slider-image="${productData.images[0]}" data-hover-slider-i="2"></div>
                                <div class="hover-slider-toggle-panel" data-hover-slider-image="${productData.images[1]}" data-hover-slider-i="3"></div>
                                <div class="hover-slider-toggle-panel" data-hover-slider-image="${productData.images[2]}" data-hover-slider-i="4"></div>
                                <div class="hover-slider-toggle-panel" data-hover-slider-image="${productData.images[3]}" data-hover-slider-i="5"></div>
                            </div>
                            <div class="hover-slider-indicator">
                                <div data-hover-slider-i="1" class="hover-slider-indicator-dot active"></div>
                                <div data-hover-slider-i="2" class="hover-slider-indicator-dot"></div>
                                <div data-hover-slider-i="3" class="hover-slider-indicator-dot"></div>
                                <div data-hover-slider-i="4" class="hover-slider-indicator-dot"></div>
                                <div data-hover-slider-i="5" class="hover-slider-indicator-dot"></div>
                            </div>
                            <img src="data:image/jpeg;base64,${productData.imageUrl}" alt="" class="main-image d-none default-image">
                            <img src="data:image/jpeg;base64,${productData.imageUrl}" alt="" class="main-image">
                        </div>
                    </a>
                    <div class="product-buttons">
                        <a href="" class="wishlist klbwl-btn"></a>
                        <a href="" class="mostcomments"></a>
                        <a href="" class="klbcp-btn klbcp-btn-521"></a>
                        <a href="" class="detail-bnt quickview animated"></a>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div class="product-title">
                        <a href="">${productData.title}</a>
                    </div>
                    <div class="product-rating">
                        <div class="star-rating" role="img" aria-label="Ocenjeno ${productData.rating}.00 od 5">
                            <span style="width: ${productData.rating * 20}%"></span>
                        </div>
                        <div class="count-rating">${productData.ratingCount}</div>
                        <div class="product-price-cart w-100">
                            <span class="price">
                                <del aria-hidden="true">
                                    <span>
                                        <bdi>
                                            <span>€</span>
                                            ${productData.oldPrice}
                                        </bdi>
                                    </span>
                                </del>
                                <ins>
                                    <span>
                                        <bdi>
                                            <span>€</span>
                                            ${productData.newPrice}
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <a href="" data-quantity="1" class="button product-type-simple add-to-cart-button ajax-add-to-cart">
                                <i class="fa-solid fa-cart-plus"></i>
                            </a>
                        </div>
                        <div class="product-meta">
                            <div class="product-message color-light" style="text-transform: uppercase">${productData.brand} ${productData.model}</div>
                            <div class="product-message color-danger">${productData.username}</div>
                        </div>
                    </div>
                </div>
                <div class="product-footer">
                    <div class="product-footer-details">
                        <p>${productData.description}</p>
                        <a href="">procitaj vise</a>
                    </div>
                </div>
            </div>
        </div>
    `;
    return productHtml;
}
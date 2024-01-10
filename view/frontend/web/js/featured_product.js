define(['ko'], function (ko) {
    var featuredProductViewModel = function (data) {
        var self = this;

        self.imageUrl = ko.observable(data.image_url);
        self.name = ko.observable(data.name);
        self.price = ko.observable(data.price);
        self.stockQty = ko.observable(data.stock_qty);
        self.productUrl = ko.observable(data.product_url);
    };

    return featuredProductViewModel;
});

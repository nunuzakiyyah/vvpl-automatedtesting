module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickSiapaMinat: by.xpath("//h3[contains(text(),'Siapa Minat, Kominfo Buka Beasiswa Talenta Digital')]")
    },

    performClick: function () {

        var selector = page.clickSiapaMinat.elements.clickSiapaMinat;
        return driver.findElement(selector).click();
    }
};

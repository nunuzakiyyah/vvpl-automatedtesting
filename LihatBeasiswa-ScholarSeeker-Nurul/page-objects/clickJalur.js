module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickJalur: by.xpath("//a[normalize-space()='Jalur Prestasi Unggulan (JPU)']")
    },

    performClick: function () {

        var selector = page.clickJalur.elements.clickJalur;
        return driver.findElement(selector).click();
    }
};

module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickReadMore: by.xpath("//a[@href='http://localhost/ScholarSeeker/Berita/daftarBerita']")
    },

    performClick: function () {

        var selector = page.clickReadMore.elements.clickReadMore;
        return driver.findElement(selector).click();
    }
};

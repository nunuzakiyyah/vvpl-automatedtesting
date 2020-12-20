module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickNews: by.xpath("//a[normalize-space()='NEWS']")
    },

    performClick: function () {

        var selector = page.clickNews.elements.clickNews;
        return driver.findElement(selector).click();
    }
};

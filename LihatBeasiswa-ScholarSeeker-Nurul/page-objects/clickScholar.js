module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickScholar: by.xpath("//a[normalize-space()='SCHOLAR']")
    },

    performClick: function () {

        var selector = page.clickScholar.elements.clickScholar;
        return driver.findElement(selector).click();
    }
};

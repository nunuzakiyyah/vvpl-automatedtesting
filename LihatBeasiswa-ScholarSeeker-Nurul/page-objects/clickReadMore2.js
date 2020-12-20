module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickReadMore2: by.xpath("//a[@href='http://localhost/ScholarSeeker/Beasiswa']")
    },

    performClick: function () {

        var selector = page.clickReadMore2.elements.clickReadMore2;
        return driver.findElement(selector).click();
    }
};

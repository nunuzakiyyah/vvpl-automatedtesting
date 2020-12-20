module.exports = {

    url: 'http://localhost/ScholarSeeker',

    elements: {
        clickDaftar: by.xpath("//input[@value='Daftar']")
    },

    performClick: function () {

        var selector = page.clickDaftar.elements.clickDaftar;
        return driver.findElement(selector).click();
    }
};

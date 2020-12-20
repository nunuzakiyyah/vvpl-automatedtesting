module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/register',

    elements: {
        userName: by.xpath("//input[@placeholder='Username']")
    },


    performFill: function () {
        var selector = page.userName.elements.userName;
        return driver.findElement(selector).sendKeys(shared.id_register.username);
    }
};

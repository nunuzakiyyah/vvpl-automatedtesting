# ./features/signin.feature

Feature: signin on the website
    As a user
    I want to be able to signin

    @success
    Scenario: User success to signin on the website
        Given user browse signin page
        And user fill email field
        And user fill password
        When user click button sign in
        Then user can see home scholarseeker

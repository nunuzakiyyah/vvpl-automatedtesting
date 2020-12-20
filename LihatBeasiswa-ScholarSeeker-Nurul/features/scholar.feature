# ./features/news.feature

Feature: see scholar on the website
    As a user
    I want to be able to see scholar

    @success
    Scenario: User success to see scholar on the website
        Given user browse home page
        And user click button scholar
        And user click button read more
        When user click scholar Jalur Prestasi Unggulan
        Then user can see scholar page

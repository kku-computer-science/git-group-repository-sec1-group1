***Settings***
Resource    resource.robot

***Test Cases***
Check Researcher Group
    Open Web
    Go To Researcher Group
    [Teardown]    Close Browser


Check Group Detail
    Open Web
    Go To Researcher Group
    # กด more detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[1]
    [Teardown]    Close Browser


Check Researcher Info
    Open Web
    Go To Researcher Group
    Click Element    xpath=(//a[contains(@href, 'researchgroupdetail')])[1]
    # กด supervisor
    Click Element    xpath=(//a[contains(@href, '/detail/')])[1]
    [Teardown]    Close Browser

***Settings***
Resource    resource.robot

***Test Cases***
Check Researcher Group
    Open Web
    Go To Researcher Group


Check Group Detail
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[1]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[1]
    Sleep    1s
    [Teardown]    Close Browser

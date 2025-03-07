***Settings***
Resource    resource.robot

***Test Cases***
Check Researcher Group
    Open Web
    Go To Researcher Group


Check Group Detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[1]
    [Teardown]    Close Browser

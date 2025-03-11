**Settings***
Resource    resource.robot
Library    XML
Library    String

***Test Cases***
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    admin@gmail.com
    Input Password    id:password    12345678
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Project Empty Name
    Click Element    css:button.create-project-btn
    Input Project    ${EMPTY}    Description    111-1111-111

Project Empty Description
    Input Project    Project    ${EMPTY}    $CONTACT

Project Empty Contact
    Input Project    Project    Description    ${EMPTY}

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Project    Description    111-1111-111

Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a
***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Test Cases ***
# Guest Check Application
Open Website
    Open Web

Visit Research Group
    Go To Researcher Group
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]

Visit Research Group Detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

Visit Application Detail
    Click Element    xpath=//a[@class='btn-job-details']

# Researcher Check Application
Open Website
    Open Web

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Switch Tab    0

Visit Research Group
    Go To Researcher Group
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]

Visit Research Group Detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

Visit Application Detail
    Click Element    xpath=//a[@class='btn-job-details']

# Head Group Check Application
Open Website
    Open Web

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Switch Tab    0

Visit Research Group
    Go To Researcher Group
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]

Visit Research Group Detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

Visit Application Detail
    Click Element    xpath=//a[@class='btn-job-details']
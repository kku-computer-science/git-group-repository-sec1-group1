***Settings***
Resource    resource.robot

***Test Cases***
Change to Thai
    Open Web
    Go To Researcher   
    Click Element    xpath=(//div[@class='row row-cols-1 row-cols-md-2 g-0']//a)[2]
                       # เช็คคาม config/language.php  
    Change Language    ไทย
    Verify Page Text    การศึกษา
    [Teardown]    Close Browser

Change to English
    Open Web
    Go To Researcher   
    Click Element    xpath=(//div[@class='row row-cols-1 row-cols-md-2 g-0']//a)[2]
    Change Language    ไทย
    Change Language    English
    Verify Page Text    Education
    [Teardown]    Close Browser

Change to Chinese
    Open Web
    Go To Researcher   
    Click Element    xpath=(//div[@class='row row-cols-1 row-cols-md-2 g-0']//a)[2]  
    Change Language    中文
    Verify Page Text    教育背景
    [Teardown]    Close Browser
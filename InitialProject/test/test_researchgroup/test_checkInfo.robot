***Settings***
Resource    resource.robot
Library    Collections

*** Variables ***
${EXPECTED_TITLE}    A Sentiment Classification from Review Corpus using Linked Open Data and Sentiment Lexicol   
${EXPECTED_RESEARCHERS}     Ngamnij Arch-int, Monlica Wattana, และคณะ   
${EXPECTED_DATE}     2021-11-21   

***Test Cases***
Check Researcher Group
    Open Web
    Go To Researcher Group


Check Group Detail
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
    Wait Until Element Is Visible    xpath=//h5[contains(text(), 'งานวิจัยที่เกี่ยวข้อง')]

    # Extract first research details
    ${research_count}=    Get Element Count    xpath=//div[contains(@class, 'card-body')]//ul/li
    Should Be True    ${research_count} > 0    No research items found!

    # Debug: Print first <li> structure to verify
    ${first_li_html}=    Get Element Attribute    xpath=(//div[contains(@class, 'card-body')]//ul/li)[1]    outerHTML
    Log    ${first_li_html}

    # Extract and verify first research entry
    ${actual_title}=    Get Text    xpath=/html/body/div[1]/div/div/div[2]/div[2]/ul/h3/li[1]/strong[2]
    ${actual_users}=    Get Text    xpath=/html/body/div[1]/div/div/div[2]/div[2]/ul/h3/li[1]/span[1]
    ${actual_date}=    Get Text    xpath=/html/body/div[1]/div/div/div[2]/div[2]/ul/h3/li[1]/span[3]/em

    # Validate research data
    Should Be Equal As Strings    ${actual_title}    ${EXPECTED_TITLE}    Research title mismatch!
    Should Be Equal As Strings    ${actual_users}    ${EXPECTED_RESEARCHERS}    
    Should Be Equal As Strings    ${actual_date}     ${EXPECTED_DATE}     Publication date mismatch!

    Sleep    2s
    [Teardown]    Close Browser

$SNMP = New-Object -ComObject olePrn.OleSNMP
$SNMP.open('192.168.1.1','private',2,1000)
$RESULT = $SNMP.get('.1.3.6.1.2.1.1.5.0') 
$RESULT2 = [TimeSpan]::FromSeconds(($SNMP.Get(".1.3.6.1.2.1.1.3.0"))/100)
$SNMP.getTree('.1.3.6.1.2.1.1.5.0')
$value="Bonjour ca va ?"
$SNMP.set('.1.3.6.1.2.1.1.5.0',$value)
$SNMP.Close()
$RESULT
$RESULT2
sr="𝙏𝙧ầ𝙣 Đă𝙣𝙜 𝙆𝙝𝙤𝙖 "
def delay(dl):
  try:
    for i in range(dl, -1, -1):
       print(sr+'Chờ '+str(i)+' Giây [–]          ',end='\r')
       sleep(0.5)
       print(sr+'Chờ '+str(i)+' Giây [\]          ',end='\r')
       sleep(0.5)
       print(sr+'Chờ '+str(i)+' Giây [|]          ',end='\r')
       sleep(0.5)
       print(sr+'Chờ '+str(i)+' Giây [/]          ',end='\r')
       sleep(0.5)
       print(sr+'Chờ '+str(i)+' Giây [–]          ',end='\r')
       sleep(0.5)
  except:
     sleep(dl)
     print(dl,end='\r')
dl=30
delay(dl)
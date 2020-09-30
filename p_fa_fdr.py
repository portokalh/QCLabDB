
import pandas as pd
import scipy.stats as stats
import numpy as np

from statsmodels.stats.multitest import fdrcorrection
from statsmodels.stats.multicomp import pairwise_tukeyhsd
from statsmodels.stats.libqsturng import psturng




#pathin='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/vol_pics/'
#df=pd.read_csv(pathin+"vol_sex_punc_pF.csv",  index_col=0)

pathin='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/fa_picsE3E4/'
df=pd.read_csv(pathin+"fa_sex_punc_t.csv",  index_col=0)


punc=df.loc['paov']
print(punc)

#p_bh=statsmodels.stats.multitest.multipletests(df_aov.loc['paov'], alpha=0.05, method='fdr_bh', is_sorted=False, returnsorted=False)

#df_aov.loc['pbh']=p_bh
h, pbh=fdrcorrection(punc)
df.at['pbh'] = pbh

df.to_csv(pathin+'corr_p.csv')
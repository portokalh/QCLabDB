import plotly.graph_objects as go
import pandas as pd
import scipy.stats as stats
#import statsmodels.api as sm
#import statsmodels.formula.api as smf
from statsmodels.stats.multicomp import pairwise_tukeyhsd
from statsmodels.stats.libqsturng import psturng
import numpy as np
import pingouin as pg
import math

#from pingouin import pairwise_tukey
#https://pingouin-stats.org/index.html - has mediation analysis

pathout='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/fa_picsE3E4/'
#####
file='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/APOE22APOE33APOE44VolumesFA062620.xlsx'
df = pd.read_excel(file, sheet_name='APOE22APOE33APOE44FA')


fileind='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/my_pfa1.xlsx'
dfind=pd.read_excel(fileind)


#fileind='/Users/alex/AlexBadea_MyPapers/APOE22APOE33APOE44/my_pfa.xlsx'
#dfind=pd.read_excel(fileind)
df_aov = dfind
df_aov.loc['ftest'] = [0 for c in df.columns]
df_aov.loc['paov'] = [0 for c in df.columns]
df_aov.loc['ttest'] = [0 for c in df.columns]



df_aov.to_csv(pathout+"fa_sex_punc_pF.csv")
dfind.to_csv(pathout+"dfindvol_sex_punc_pF.csv")


groupstats = df.groupby(['Genotype']).agg(['mean', 'std'] )
groupstats.to_csv(pathout+'mean_std_vol.csv')

groupstats2 = df.groupby(['Genotype']).agg(['mean'] )
groupstats3 = df.groupby(['Genotype']).agg(['std'] )
groupstats4 = df.groupby(['Genotype']).agg(['mean', 'std'] )

#print(groupstats3)
#groupstats2.append(groupstats3,ignore_index=True)
groupstats2.to_csv(pathout+'fa_mean.csv')
groupstats3.to_csv(pathout+'fa_std.csv')
groupstats4.to_csv(pathout+'concat_fa_std.csv')

#print (groupstats2.loc['APOE33'])


'''
ci95_hi = []
ci95_lo = []
print(groupstats)

for i in groupstats.index:
    m, c, s = groupstats.loc[i]
    ci95_hi.append(m + 1.96*s/math.sqrt(c))
    ci95_lo.append(m - 1.96*s/math.sqrt(c))

groupstats['ci95_hi'] = ci95_hi
groupstats['ci95_lo'] = ci95_lo
print(groupstats)
'''

#for col in dfind.columns[8:]:
for col in dfind.columns[8:]:



	#if dfind[col][0] < 0.05:
		print(col)
		fig = go.Figure()

		# print(df['Genotype'].isin(['APOE22','APOE33','APOE44']))
		df_short=df[df['Genotype'].isin(['APOE22','APOE33','APOE44'])]
        
        
		t_value_g, p_value_g=stats.ttest_ind(df_short[col][df_short['Genotype'] == 'APOE33'],
			df_short[col][df_short['Genotype'] == 'APOE44'])

		

		df_aov.at['ttest',col] = t_value_g
		df_aov.at['paov',col] = p_value_g



		Genotypes = ['APOE33', 'APOE44']
		colors = ["red","green","purple"]
		for i in range(2):
			genotype = Genotypes[i]
			color = colors[i]
			fig.add_trace(go.Violin(x=df_short['Genotype'][df_short['Genotype'] == genotype][df_short['Sex'] == 'male'],
									y=df_short[col][df['Genotype'] == genotype][df_short['Sex'] == 'male'], name=genotype+' male',
									#legendgroup='M', scalegroup='M', #name='M',
									box_visible=True, meanline_visible=True,line_color='blue'))
			fig.add_trace(go.Violin(x=df_short['Genotype'][df['Genotype'] == genotype][df_short['Sex'] == 'female'],
									y=df_short[col][df_short['Genotype'] == genotype][df_short['Sex'] == 'female'], name=genotype+' female',
									#legendgroup='F', scalegroup='F', #name='F',
									box_visible=True, meanline_visible=True,line_color='orange'))

		fig.update_traces(box_visible=True, meanline_visible=True, points='all', jitter=0.05)
		fig.update_layout(violinmode='group')
		fig.update_layout(
			#title=col + "  p = " + str(dfind[col][0]) + ' '+ "genotype:" + str(p_value_g)+ ' ' + "genotype and sex" + str(p_value_gs),
		    title= col + "  p = " + "{:f}".format(p_value_g),
		    xaxis_title="Genotype",
		    yaxis_title="FA (AU)",
		)
		#fig.update_layout(template="plotly_white")
		#fig.show()
		fig.write_image(pathout+col+"_fa_sex_rawMF.png")


df_aov.to_csv(pathout+"fa_sex_punc_t.csv")



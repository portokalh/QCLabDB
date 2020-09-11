To install and launch neuroglancer see this:

conda update --update-all
conda update anaconda
#https://docs.conda.io/projects/conda/en/latest/user-guide/tasks/manage-python.html
conda create -n py38 python=3.8 anaconda
conda activate py38
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash
python -m pip install neuroglancer


cd /Users/alex/anaconda/envs/py38/lib/python3.8/site-packages/neuroglancer/
cd /Users/alex/anaconda/envs/py38/lib/python3.8/site-packages/neuroglancer/
python server.py


python test_ng.py
